<script>

window.onload=function(){
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");

    c.height = window.innerHeight;
    c.width = window.innerWidth;

    var r = "7f0";
    var g = "f80";
    var b = "f09";
    var matrix = "СЪЕШЬЕЩЁЭТИХМЯГКИХФРАНЦУЗКИХБУЛОКДАВЫПЕЙЧАЮ!123456789@#$%^&*()*&^%";
    matrix = matrix.split("");
    r = r.split("");
    g = g.split("");
    b = b.split("");

    var font_size = 10;
    var columns = c.width/font_size; 

    var drops = [];

    for(var x = 0; x < columns; x++)
        drops[x] = 1; 

    function draw()
    {
 
        var coltext = "#00ff00"
        ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
        ctx.fillRect(0, 0, c.width, c.height);

        ctx.fillStyle = coltext;
        ctx.font = font_size + "px arial";
        for(var i = 0; i < drops.length; i++)
        {

            var text = matrix[Math.floor(Math.random()*matrix.length)];
            ctx.fillText(text, i*font_size, drops[i]*font_size);
            if(drops[i]*font_size > c.height && Math.random() > 0.975)
                drops[i] = 0;
                drops[i]++;
            }
        }

    setInterval(draw, 35);
};
</script>

<style>
    *{
   margin:0; 
   padding:0;
}

body{
   background:black;
}

canvas{
    height: 100vh;
    width: 100%;
    display:block;
}
</style>

<html>
    <body>
        <canvas id="c"></canvas>
    </body>
</html>
