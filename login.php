<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>G's Profile</title>
    <!-- Stylesheetの読み込み -->
    <link rel="stylesheet" href="css_php/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="css_php/english.css">

    <!-- jQueryの読み込み -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>

<body class="body-wrapper">
    <div class="title-wrapper">
        <h1 class="siteTitle">G's English</h1>
        <h2 class="siteSubTitle">- How to use PHP -</h2>
    </div>

    <article class="profile-wrapper">
        <section class="profile-head">
            <div>
                <h2 class="siteSubTitle">ログイン画面</h2>
            </div>
            <div class="profile-box">
                <a href="bm_nonlogin_list_view.php">ブックマーク一覧</a>
            </div>
        </section>

        <section class="profile-box">
            <div class="profile-title">
                <h2>管理者はこちら</a></h2>
            </div>

            <form action="login_act.php" name="formProfile" method="POST">
                <div class="form-field">
                    <label for="userId">ユーザーネーム</label>
                    <input id="userId" class="long-input" name="userId" type="text" value="">
                </div>
                <div class="form-field">
                    <label for="pwd">パスワード</label>
                    <input id="pwd" class="long-input" name="pwd" type="text" value="">
                </div>

                <div class="save-btn-field">
                    <input id="form-check-btn" class="save-btn" type="submit" value="ログイン">
                </div>
            </form>

        </section>


    </article>


    <footer>
        <p class="copyright">
            <small>copyrights 2018 Yasuhiro Kitamura All RIghts Reserved.</small>
        </p>
    </footer>


</body>

</html>