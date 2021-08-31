//动态网站名称
var OriginTitile = document.title;
var st;
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        document.title = "您有一封情书💌 请查收~";
        clearTimeout(st);
        console.log('hide');
    } else {
        document.title = OriginTitile;
        console.log('show');
        st = setTimeout(function() {
            document.title = OriginTitile;
        }, 4000);
        console.log('endChange=');
    }
});