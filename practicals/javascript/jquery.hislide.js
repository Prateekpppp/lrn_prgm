(function($) {
    
    var slide = function(ele,options) {
        var $ele = $(ele);
        // 默认设置选项
        var setting = {
        		// 控制轮播的动画时间
            speed: 1000,
            // 控制 interval 的时间 (轮播速度)
            interval: 2000,
            
        };
        // 对象合并
        $.extend(true, setting, options);
        var states = [];
        
            if ($(window).width()<480) {
                states = [
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 10, $opacity: 0.4, $topacity: 0 },
                    { $zIndex: 2, width: 224, height: 288, top: 0, left: 70, $opacity: 1, $topacity: 1 },
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 175, $opacity: 0.4, $topacity: 0 }
                ];
                
            }
            else if ($(window).width()<900) {
                states = [
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 90, $opacity: 0.4, $topacity: 0 },
                    { $zIndex: 2, width: 224, height: 288, top: 0, left: 248, $opacity: 1, $topacity: 1 },
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 460, $opacity: 0.4, $topacity: 0 }
                ];
            }
            else if ($(window).width()<1090) {
                states = [
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 202, $opacity: 0.4, $topacity: 0 },
                    { $zIndex: 2, width: 224, height: 288, top: 0, left: 365, $opacity: 1, $topacity: 1 },
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 580, $opacity: 0.4, $topacity: 0 }
                ];
            } else{
                states = [
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 110, $opacity: 0.4, $topacity: 0  },
                    { $zIndex: 2, width: 224, height: 288, top: 0, left: 263, $opacity: 1, $topacity: 1  },
                    { $zIndex: 1, width: 170, height: 218, top: 35, left: 470, $opacity: 0.4, $topacity: 0  }
                ];
            }
        
        

        var $lis = $ele.find('li');
        var timer = null;

        // 事件
        $ele.find('.nxts').on('click', function() {
            next();
        });
        $ele.find('.prvs').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
            console.log("mouse enter");
        }).on('mouseleave', function() {
            // autoPlay();
        });

        move();
        // autoPlay();

        // 让每个 li 对应上面 states 的每个状态
        // 让 li 从正中间展开
        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).find('.sldtxt').css('opacity', state.$topacity);
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);
                
            });
        }

        // 切换到下一张
        function next() {
            // 原理：把数组最后一个元素移到第一个
            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    }
    // 找到要轮播的轮播图的根标签，调用 slide()
    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
        // 返回值，以便支持链式调用
        return this;
    }
})(jQuery);
