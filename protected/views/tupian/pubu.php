<link rel='stylesheet' href='/css/pubu/style.css' media='screen' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/js/blocksit.min.js"></script>
<script>
$(document).ready(function() {
    
    //blocksit define
    $(window).load( function() {
        $('#container').BlocksIt({
            numOfCol: 5,
            offsetX: 8,
            offsetY: 8
        });
    });
    
    //window resize
    var currentWidth = 1100;
    $(window).resize(function() {
        var winWidth = $(window).width();
        var conWidth;
        if(winWidth < 660) {
            conWidth = 440;
            col = 2
        } else if(winWidth < 880) {
            conWidth = 660;
            col = 3
        } else if(winWidth < 1100) {
            conWidth = 880;
            col = 4;
        } else {
            conWidth = 1100;
            col = 5;
        }
        
        if(conWidth != currentWidth) {
            currentWidth = conWidth;
            $('#container').width(conWidth);
            $('#container').BlocksIt({
                numOfCol: col,
                offsetX: 8,
                offsetY: 8
            });
        }
    });
});
</script>
<link rel="shortcut icon" href="http://www.inwebson.com/wp-content/themes/inwebson2/favicon.ico" />
<link rel="canonical" href="http://www.inwebson.com/demo/blocksit-js/demo2/" />

<!-- Content -->
<section id="wrapper">
    <hgroup>
        <h2>辰木社区</h2> 
        <h3>瀑布流插件整理</h3>
    </hgroup>
<div id="container">
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img27.jpg" />
        </div>
        <strong>Sunset Lake</strong>
        <p>A peaceful sunset view...</p>
        <div class="meta">by j osborn</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img26.jpg" />
        </div>
        <strong>Bridge to Heaven</strong>
        <p>Where is the bridge lead to?</p>
        <div class="meta">by SigitEko</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img15.jpg" />
        </div>
        <strong>Autumn</strong>
        <p>The fall of the tree...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img23.jpg" />
        </div>
        <strong>Winter Whisper</strong>
        <p>Winter feel...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img17.jpg" />
        </div>
        <strong>Light</strong>
        <p>The only shinning light...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img22.jpg" />
        </div>
        <strong>Rooster's Ranch</strong>
        <p>Rooster's ranch landscape...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img16.jpg" />
        </div>
        <strong>Autumn Light</strong>
        <p>Sun shinning into forest...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img21.jpg" />
        </div>
        <strong>Yellow cloudy</strong>
        <p>It is yellow cloudy...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img28.jpg" />
        </div>
        <strong>Herringfleet Mill</strong>
        <p>Just a herringfleet mill...</p>
        <div class="meta">by Ian Flindt</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img2.jpg" />
        </div>
        <strong>Battle Field</strong>
        <p>Battle Field for you...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img24.jpg" />
        </div>
        <strong>Sundays Sunset</strong>
        <p>Beach view sunset...</p>
        <div class="meta">by Robert Strachan</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img19.jpg" />
        </div>
        <strong>Sun Flower</strong>
        <p>Good Morning Sun flower...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img5.jpg" />
        </div>
        <strong>Beach</strong>
        <p>Something on beach...</p>
        <div class="meta">by unknown</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img25.jpg" />
        </div>
        <strong>Flowers</strong>
        <p>Hello flowers...</p>
        <div class="meta">by R A Stanley</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img20.jpg" />
        </div>
        <strong>Alone</strong>
        <p>Lonely plant...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div> <!---->
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img27.jpg" />
        </div>
        <strong>Sunset Lake</strong>
        <p>A peaceful sunset view...</p>
        <div class="meta">by j osborn</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img26.jpg" />
        </div>
        <strong>Bridge to Heaven</strong>
        <p>Where is the bridge lead to?</p>
        <div class="meta">by SigitEko</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img15.jpg" />
        </div>
        <strong>Autumn</strong>
        <p>The fall of the tree...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img23.jpg" />
        </div>
        <strong>Winter Whisper</strong>
        <p>Winter feel...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img17.jpg" />
        </div>
        <strong>Light</strong>
        <p>The only shinning light...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img22.jpg" />
        </div>
        <strong>Rooster's Ranch</strong>
        <p>Rooster's ranch landscape...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img16.jpg" />
        </div>
        <strong>Autumn Light</strong>
        <p>Sun shinning into forest...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img21.jpg" />
        </div>
        <strong>Yellow cloudy</strong>
        <p>It is yellow cloudy...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img28.jpg" />
        </div>
        <strong>Herringfleet Mill</strong>
        <p>Just a herringfleet mill...</p>
        <div class="meta">by Ian Flindt</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img2.jpg" />
        </div>
        <strong>Battle Field</strong>
        <p>Battle Field for you...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img24.jpg" />
        </div>
        <strong>Sundays Sunset</strong>
        <p>Beach view sunset...</p>
        <div class="meta">by Robert Strachan</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img19.jpg" />
        </div>
        <strong>Sun Flower</strong>
        <p>Good Morning Sun flower...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img5.jpg" />
        </div>
        <strong>Beach</strong>
        <p>Something on beach...</p>
        <div class="meta">by unknown</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img25.jpg" />
        </div>
        <strong>Flowers</strong>
        <p>Hello flowers...</p>
        <div class="meta">by R A Stanley</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img20.jpg" />
        </div>
        <strong>Alone</strong>
        <p>Lonely plant...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div> <!---->
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img27.jpg" />
        </div>
        <strong>Sunset Lake</strong>
        <p>A peaceful sunset view...</p>
        <div class="meta">by j osborn</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img26.jpg" />
        </div>
        <strong>Bridge to Heaven</strong>
        <p>Where is the bridge lead to?</p>
        <div class="meta">by SigitEko</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img15.jpg" />
        </div>
        <strong>Autumn</strong>
        <p>The fall of the tree...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img23.jpg" />
        </div>
        <strong>Winter Whisper</strong>
        <p>Winter feel...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img17.jpg" />
        </div>
        <strong>Light</strong>
        <p>The only shinning light...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img22.jpg" />
        </div>
        <strong>Rooster's Ranch</strong>
        <p>Rooster's ranch landscape...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img16.jpg" />
        </div>
        <strong>Autumn Light</strong>
        <p>Sun shinning into forest...</p>
        <div class="meta">by Lars van de Goor</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img21.jpg" />
        </div>
        <strong>Yellow cloudy</strong>
        <p>It is yellow cloudy...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img28.jpg" />
        </div>
        <strong>Herringfleet Mill</strong>
        <p>Just a herringfleet mill...</p>
        <div class="meta">by Ian Flindt</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img2.jpg" />
        </div>
        <strong>Battle Field</strong>
        <p>Battle Field for you...</p>
        <div class="meta">by Andrea Andrade</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img24.jpg" />
        </div>
        <strong>Sundays Sunset</strong>
        <p>Beach view sunset...</p>
        <div class="meta">by Robert Strachan</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img19.jpg" />
        </div>
        <strong>Sun Flower</strong>
        <p>Good Morning Sun flower...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img5.jpg" />
        </div>
        <strong>Beach</strong>
        <p>Something on beach...</p>
        <div class="meta">by unknown</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img25.jpg" />
        </div>
        <strong>Flowers</strong>
        <p>Hello flowers...</p>
        <div class="meta">by R A Stanley</div>
    </div>
    <div class="grid">
        <div class="imgholder">
            <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img20.jpg" />
        </div>
        <strong>Alone</strong>
        <p>Lonely plant...</p>
        <div class="meta">by Zsolt Zsigmond</div>
    </div> <!---->
</div>
</section>

