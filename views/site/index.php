<?php
$this->title = 'Welcome';
?>
<div class="jumbotron">
    <ul id="exampleSlider" style="list-style-type:none">
        <li><img class="one" src="../../web/css/images/car1.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car2.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car3.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car4.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car5.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car6.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car7.jpg" /></li>
        <li><img class="one" src="../../web/css/images/car8.jpg" /></li>
    </ul>
</div>  
<script type="text/javascript">
    $(function () {
        var change_img_time = 4500; // set 4.5 sec for changing the image
        var transition_speed = 400;
        var simple_slideshow = $("#exampleSlider"),
                listItems = simple_slideshow.children('li'),
                listLen = listItems.length,
                i = 0,
                changeList = function () {
                    listItems.eq(i).fadeOut(transition_speed, function () {
                        i += 1;
                        if (i === listLen) {
                            i = 0;
                        }
                        listItems.eq(i).fadeIn(transition_speed);
                    });
                };
        listItems.not(':first').hide();
        setInterval(changeList, change_img_time);
    });
</script>