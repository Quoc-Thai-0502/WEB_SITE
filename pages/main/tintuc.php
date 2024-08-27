<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức Điện Thoại Mới Nhất</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin-top: 30px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .article {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }
        .article h2 {
            margin-top: 0;
        }
        .article img {
            max-width: 100%;
            height: auto;
        }
        .article a {
            color: #1a73e8;
            text-decoration: none;
        }
        .article a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tin Tức Điện Thoại Mới Nhất</h1>
        
        <?php
        if ($news_data['status'] == 'ok') {
            foreach ($news_data['articles'] as $article) {
                echo '<div class="article">';
                echo '<h2><a href="' . $article['url'] . '" target="_blank">' . $article['title'] . '</a></h2>';
                if (!empty($article['urlToImage'])) {
                    echo '<img src="' . $article['urlToImage'] . '" alt="' . $article['title'] . '">';
                }
                echo '<p>' . $article['description'] . '</p>';
                echo '<p>Nguồn: ' . $article['source']['name'] . ' - ' . date('d/m/Y H:i', strtotime($article['publishedAt'])) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Không thể tải tin tức. Vui lòng thử lại sau.</p>';
        }
        ?>
    </div>
</body>
</html>