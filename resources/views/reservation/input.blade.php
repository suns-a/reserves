<title>会議室予約</title>
<form action="" method="post" style="background-color:#F0F8FF">
<div style="text-align: center; font-size:50px">会議室予約</div>
    事業部
    <div>
    <select class="my_class" name="FORM_NAME">
    <option value="">選択してください</option>
    <option value="1">人事部</option>
    <option value="2">総務部</option>
    <option value="3">営業部</option>
    <option value="4">開発事業部</option>
    <option value="5">リフォーム事業部</option>
    <option value="6">制作事業部</option>
    <option value="7">IT事業部</option>
    <option value="8">ペット事業部</option>
    </select>
    </div>
    予約者名
    <div><input type="text" name="name" placeholder></div>
    日付
    <div><input type="date" name="day" placeholder></div>
    開始時間
    <div><input type="time" name="starttime"></div>
    終了時間
    <div><input type="time" name="endtime"></div>
    内容
    <div>
    <select class="my_class" name="FORM_NAME">
    <option value="">選択してください</option>
    <option value="1">面接</option>
    <option value="2">ミーティング</option>
    <option value="3">来客</option>
    <option value="4">テレアポ</option>
    <option value="5">その他</option>
    </select>
    </div>
    <br>
    <div class="reset">
        <input type="reset" value="リセット" style="cursor:pointer; font-size:30px; width:150px; border:1px solid white; background-color:orange; color:white; margin-bottom:20px;">
    </div>
    <div class="submit">
        <input type="submit" value="予約" style="cursor:pointer; font-size:30px; width:150px; border:1px solid white; background-color:#FF69B4; color:white" onclick="alert('予約しました');">
    </div>
</form>