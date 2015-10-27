<html>
<head>
    <style>
        ul.dropdown li { position: relative; }
        ul.dropdown,
        ul.dropdown-inside {
            list-style-type: none;
            padding: 0;
        }
        ul.dropdown-inside {
            position: absolute;
            left: -9999px;
        }
        ul.dropdown li.dropdown-top {
            display: inline;
            float: left;
            margin: 0 1px 0 0;
        }
        ul.dropdown li.dropdown-top a {
            padding: 3px 10px 4px;
            display: block;
        }
        ul.dropdown a.dropdown-top { background: #efefef; }
        ul.dropdown a.dropdown-top:hover { padding: 2px 10px 5px; }
        ul.dropdown li.dropdown-top:hover .dropdown-inside {
            display: block;
            left: 0;
        }
        ul.dropdown .dropdown-inside { background: #fff; }
        ul.dropdown .dropdown-inside a:hover { background: #efefef; }
    </style>
</head>
<body>
<ul class="dropdown">
    <li class="dropdown-top">
        <p>Menu</p>
        <ul class="dropdown-inside">
            <?php
            echo "<li>". "<a href =" . BASE_URL."/register/register>Register </a>" . "</li>";
            echo "<li>". "<a href =" . BASE_URL."/login/login>Login </a>" . "</li>";
            ?>

        </ul>
    </li>
    </ul>
</body>
</html>