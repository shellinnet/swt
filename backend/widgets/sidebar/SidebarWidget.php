<?php
namespace backend\widgets\sidebar;

/**
 * 后台左边显示栏
 */
use Yii;
use yii\base\Widget;
use yii\widgets\Menu;
use yii\helpers\Html;

class SidebarWidget extends Menu
{    
    public $submenuTemplate = "\n<ul class=\"children\">\n{items}\n</ul>\n";
    
    public $options = ['class'=>'nav nav-pills nav-stacked nav-quirk'];
    
    public $activateParents = true;
    
    public function init()
    {
        $this->items = [
          
          ['label' =>'<a href=""><i class="fa  fa-group"></i><span>学员管理</span></a>','url'=>['site/index'],'options'=>['class'=>'nav-parent'],'items'=>[

                    ['label'=>'普通学员注册','url'=>['usermobile/register']],
                    ['label'=>'VIP学员注册','url'=>['usermobile/vipregister']],

                    ['label'=>'所有学员管理','url'=>['usermobile/main'],'items'=>[
    
                    ['label'=>'学员详情','url'=>['shop-user/view'],'visible'=>false],
                    ['label'=>'学员设置','url'=>['shop-user/update'],'visible'=>false],
                    
                ],
                ],
                
               ],
            ],
 ['label' =>'<a href=""><i class="fa  fa-group"></i><span>老师管理</span></a>','options'=>['class'=>'nav-parent'],'items'=>[

                ['label'=>'老师注册','url'=>['teacher/register']],    
                 ['label'=>'老师课程添加','url'=>['teacher/teachermsg']],
                ['label'=>'老师课程信息管理','url'=>['teacher/main']],
               

               ],
            ],
  ['label' =>'<a href=""><i class="fa  fa-database"></i><span>课程管理</span></a>','options'=>['class'=>'nav-parent'],
               'items'=>[
                    ['label'=>'添加课程','url'=>['kecheng/addkecheng']],
                    ['label'=>'课程管理','url'=>['kecheng/main']],

                    ['label'=>'课表信息及补签到','url'=>['kecheng/kebiao']],
                    ['label'=>'VIP课表信息及补签到','url'=>['kecheng/vipkebiao']],
                    ['label'=>'课表下载','url'=>['kecheng/download']],
                  
                     ],
            ],
 ['label' =>'<a href=""><i class="fa fa-th-list"></i><span>通知管理</span></a>','options'=>['class'=>'nav-parent'],'items'=>[
                      ['label'=>'四物堂放假，课程调整','url'=>['kecheng/xiuxi']],
                   ['label'=>'老师休息，课程调整','url'=>['tongzhi/message']],                
                    ['label'=>'小程序通知内容管理','url'=>['tongzhi/main']],

                   ['label'=>'四物堂放假，老师休息所有信息','url'=>['tongzhi/allmessage']],
                    ['label'=>'发送短信管理','url'=>['tongzhi/message2']],
                ]
            ],         
            
             ['label' =>'<a href=""><i class="fa fa-user"></i><span>教务人员设置</span></a>','options'=>['class'=>'nav-parent'],'items'=>[
                    ['label'=>'教务人员信息','url'=>['admin/main']],

                    // ['label'=>'教务人员权限设置','url'=>['manage/managers']],
                    
                ]
            ],

            ['label' =>'<a href=""><i class="fa fa-group"></i><span>统计管理</span></a>','options'=>['class'=>'nav-parent'],'items'=>[
                    ['label'=>'学员签到记录统计','url'=>['xueyuan/tongji']],
                    ['label'=>'老师课时统计','url'=>['teacher/tongji']],
                    ['label'=>'学员报名情况统计','url'=>['xueyuan/qian']],
                    ['label'=>'注册学员详情统计','url'=>['xueyuan/zhuce']],
                ]
            ],
            ['label' =>'<a href=""><i class="fa  fa-lock"></i><span>系统管理设置</span></a>','options'=>['class'=>'nav-parent'],'items'=>[
                    ['label'=>'人员权限管理','url'=>['rbac/quan']],
                    ['label'=>'权限管理','url'=>['rbac/roles']],
                    ['label'=>'基本权限设置','url'=>['rbac/jiben']],
                    // ['label'=>'创建权限名','url'=>['rbac/createrole']],
                    // ['label'=>'权限设置','url'=>['rbac/index']],
                   
                ]
            ],
        ];

    }

    /**
     * Normalizes the [[items]] property to remove invisible items and activate certain items.
     * @param array $items the items to be normalized.
     * @param boolean $active whether there is an active child menu item.
     * @return array the normalized menu items
     */
    protected function normalizeItems($items, &$active)
    {
        foreach ($items as $i => $item) {
            if (!isset($item['label'])) {
                $item['label'] = '';
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $items[$i]['label'] = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $items[$i]['items'] = $this->normalizeItems($item['items'], $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item)) {
                    $active = $items[$i]['active'] = true;
                } else {
                    $items[$i]['active'] = false;
                }
            } elseif ($item['active']) {
                $active = true;
            }
             
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
        }
    
        return array_values($items);
    }
}