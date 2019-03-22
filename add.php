<form action="add-x.php" method="post" enctype="multipart/form-data">
<!-- 浮动标签 -->
<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">TO:</label>
  <input name="to" type="text" class="mdui-textfield-input" type="email"/>
</div>
<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">表白内容:</label>
  <input name="information" type="text" class="mdui-textfield-input" type="email"/>
</div>
<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">from:</label>
  <input name="from" type="text" class="mdui-textfield-input" type="email"/>
  <div class="mdui-textfield-helper">提示:该处如果不填写则显示为匿名</div>
</div>
<center>
<input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="我要表白" />
</center>
</form>