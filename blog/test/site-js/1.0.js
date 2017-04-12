var navObj;
var topVal;
var i = 0;
window.onload = function() {
    // 为li标签设置鼠标经过与离开的css
    var lis = document.getElementsByTagName("li");
    for (var i = 0; i < lis.length; i++) {
        if (lis[i].parentNode.parentNode.className == "head-nav") {
            lis[i].onmouseover = function() {
                this.className = "nav-li-over";
            }

            lis[i].onmouseout = function() {
                this.className = "nav-li-out";
            }
        }
    }
    setInterval(setTime, 1000);
}

window.onscroll = function() {
    navObj = document.getElementsByClassName('head-nav')[0];
    var scrollTop = document.body.scrollTop;
    if (parseInt(scrollTop) > 130) {
        navObj.style.display = "none";
    } else {
        navObj.style.display = "";
    }
}

function secondToDate(second) {
    if (!second) {
        return 0;
    }
    var time = new Array(0, 0, 0, 0, 0);
    if (second >= 365 * 24 * 3600) {
        time[0] = parseInt(second / (365 * 24 * 3600));
        second %= 365 * 24 * 3600;
    }
    if (second >= 24 * 3600) {
        time[1] = parseInt(second / (24 * 3600));
        second %= 24 * 3600;
    }
    if (second >= 3600) {
        time[2] = parseInt(second / 3600);
        second %= 3600;
    }
    if (second >= 60) {
        time[3] = parseInt(second / 60);
        second %= 60;
    }
    if (second > 0) {
        time[4] = second;
    }
    return time;
}

function setTime() {
    var create_time = Math.round(new Date(Date.UTC(2016, 04, 22, 8, 8, 8)).getTime() / 1000);
    var timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
    currentTime = secondToDate((timestamp - create_time));
    if (currentTime[0] = "0") {
        currentTimeHtml = currentTime[1] + '天' + currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4] + '秒';
    } else {
        currentTimeHtml = currentTime[0] + '年' + currentTime[1] + '天' + currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4] + '秒';
    }

    document.getElementById("run-time").innerHTML = currentTimeHtml;
}