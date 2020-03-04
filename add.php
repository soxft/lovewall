<?php require_once( './header.php'); ?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>表白</h2>

        <div class="mdui-textfield">
            <input id="name" name="name" class="mdui-textfield-input" type="text" placeholder="你的名称" />
        </div>
        <div class="mdui-textfield">
            <input id="osname" name="osname" class="mdui-textfield-input" type="text" placeholder="TA的名称" />
        </div>
        <div class="mdui-textfield">
            <input id="content" name="content" class="mdui-textfield-input" type="text" placeholder="你想对TA说的话" />
        </div>
        <br>
        <button onClick="Submit();" id="Submit" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">near_me</i>
        </button>
    </div>
</div>
<script>
function Submit() {
    document.getElementById("Submit").innerHTML = "提交中...";
    var name = document.getElementById("name").value;
    var osname = document.getElementById("osname").value;
    var content = document.getElementById("content").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./submit.php");
    xhr.setRequestHeader('Content-Type', ' application/x-www-form-urlencoded');
    xhr.send("name=" + name + "&osname=" + osname + "&content=" + content);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("Submit").innerHTML = "<i class=\"mdui-icon material-icons\">near_me</i>";
            if (xhr.responseText == 200) {
                mdui.dialog({
                    title: '表白成功...',
                    content: '愿你们真诚的相爱之火，如初升的太阳，越久越旺；让众水也不能熄灭，大水也不能淹没！',
                    modal: true
                });
                setTimeout(() => {
                    window.location.href = "./index.php";
                }, 3000);
            } else {
                mdui.alert(xhr.responseText, '表白失败...');
            }
        }
    }
}
</Script>
<br />
</body>
<?php require_once( './footer.php'); ?>