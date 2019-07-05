
    var index = 0;
    var Numn = "";

    //获取图片的个数
    var imgNum = $(".box").find('img').length;

    //获取每张图片的宽度
    var imgWidth = $(".box").find('img').width();

    //计算所有图片的宽度
    var AllImgWidth = imgNum*imgWidth;
//        alert(AllImgWidth);

    function selectimg(index) {
        $(".box").animate({"margin-left":"-" + imgWidth*index + "px"},600);
        $(".Dots a").eq(index).addClass("active").siblings('a').removeClass('active');

    }

    //点击prev的按钮
    $(".but .prev").click(function(){
       index -= 1;
        if(index < 0){
            index = imgNum - 1;
        }
        selectimg(index);
    });

    //点击next按钮
    $(".but .next").click(function(){
       index += 1;
        if( index > 2){
            index = 0;
        }
        selectimg(index);
    });

    //鼠标放上去暂停轮播
    $('.banner').hover(function(){
        clearInterval(p);
    },function () {
        pic();
    });

    //自动轮播
    // 1、轮播切换图片函数，不断的改变index的值
    // 2、然后乘以宽度（总宽度）
    function pic(){

        p = setInterval(function(){
            index++;
            if(index >= imgNum){
                index = 0;
            }
            selectimg(index);
        },3000);

    }

    //获取按钮的个数；向页面添加按钮
    for(var icon = 0; icon < imgNum; icon++){
        Numn +="<a href='javascript:;'></a>";
    }
    $('.Dots').html(Numn);
    $('.Dots a').eq(0).addClass('active');

    //点击.Dots a切换到对应的图
    $(".Dots a").each(function(index){
        $(this).click(function(){
            $('.box').animate({'margin-left':'-' + imgWidth*index + 'px'},600);
            $(".Dots a").eq(index).addClass("active").siblings("a").removeClass("active");
        })
    });

    pic();
