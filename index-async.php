<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson4</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header{
            width: 100%;
            text-align: center;
            height: 3em;
            line-height: 3em;
            color: blue;
        }
        .items{
            width: 500px;
            margin: 0 auto;
          
            
        }
        .list-item{
            display: flex;
            justify-content: space-between;
        }
        button{
            width: 500px;
            }
            .loader {
                margin: 0 auto;
                width: 100px;
                padding: 15px;
                animation: blink 0.5s infinite; 

            }
            @keyframes blink {
            from { opacity: 1;color:red;  }
            to { opacity: 0.5;color:blue;  }
   }
    </style>
</head>
<body>
    <div class="header">Мышки</div>
    <div class="loader" style="display:none">ЗАГРУЗКА</div>
    <div class="items">
      <div class="items__list"><? require('./query.php');
      ?>
      </div>
    <button onclick="getMore()">Ещё</button>
    </div>
    <script>
        let limit = 6;
        async function getMore() {
            let status = true;
            if(status) {
                document.querySelector('.loader').style.display = 'block';
            }
            let res = await fetch(`./query.php?limit=${limit}`, {method:'GET'});
            let data = await res.text();
            status = false;
            if(!status) {
                document.querySelector('.loader').style.display = 'none';
            }
          document.querySelector('.items__list').innerHTML = data;
          limit += 3;
        }
    </script>
</body>
</html>