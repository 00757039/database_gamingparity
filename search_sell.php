<?php
    $game_sell = $_POST["sell"];
    $query = ("select * 
               from game natural join developer natural join information
               where Platform=?");
    $stmt = $db->prepare($query);
    $error = $stmt->execute(array($game_sell));
    $result = $stmt->fetchAll();
    print '
    <html>
    <head>
        <meta charset="utf-8">
    <title>Game search</title>
    <style type="text/CSS">
    html { box-sizing: border-box; }
    *, *::before, *::after { box-sizing: inherit; }
    
    body {
        padding: 20px 0;
    }
    
    h1, h2 {
        margin: 0;
        padding: 34px 0 14px 40px;
    }
    
    nav > ul {
        background-color: rgb(230, 230, 230);
        list-style: none;   /* 移除項目符號 */
        margin: 0;
        padding: 0;
    }
    
    nav a {
        color: inherit; /* 移除超連結顏色 */
        display: block; /* 讓 <a> 填滿 <li> */
        font-size: 1.2rem;
        padding: 10px;
        text-decoration: none;  /* 移除超連結底線 */
    }
    
    /* 滑鼠移到 <a> 時變成深底淺色 */
    nav li:hover {
        background-color: rgb(115, 115, 115);
        color: white;
    }
    
    .flex-nav {
        display: flex;
        /* justify-content: center;*/
    }
    
    #shadowbox {
    
      border: 1px solid #333;
      box-shadow: 8px 8px 5px #444;
      padding: 8px 12px;
      background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
      text-align: center;
      margin:0px auto;
      font-size:20px;
      margin:5px 130px 15px 130px;
    }
    </style>
        
    </head>
    <nav>
        <ul class="flex-nav">
            <li><a href="index.html">首頁</a></li>
            <li><a href="game_search.html">遊戲比價</a></li>
            <li><a href="data_update.html">更新資料</a></li>
        </ul>
    </nav>
    <body background="https://i.ibb.co/CsMxYy0/tDQMOc.jpg">
        <br></br>
        <br></br>
        <div  id="shadowbox">
            <form action="search_sell.php" method="post">
            搜尋：<input type="text" name="sell" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字">
            <input type="submit" value="送出">
            </form>
            <table class="order-table">
              <thead>
                <tr>
                  <th>遊戲</th>
                  <th>價錢</th>
                  <th>資訊</th>
                  <th>開發者</th>
                  <th>購買平台</th>
                  <th>上市</th>
                </tr>
              </thead>
              <tbody>';
              for($i=0;$i<count($result);$i++)
              {
                  print'<tr>';
                  print'<td>'.$result[$i]['Name'].'</td>';
                  print'<td>'.$result[$i]['price'].'</td>';
                  print'<td>'.$result[$i]['platform'].'</td>';
                  print'<td>'.$result[$i]['description'].'</td>';
                  print'<td>'.$result[$i]['developer'].'</td>';
                  print'<td>'.$result[$i]['developer_description'].'</td>';
                  print'</tr>';
              }
              print'</tbody>
            </table>
        </div>
        </body>
        </html>';
?>