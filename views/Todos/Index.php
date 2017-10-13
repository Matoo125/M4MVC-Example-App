<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <div id="myDIV" class="header">
    <h2>My To Do List</h2>
    <form action="/todos/add" method="post">
      <input type="text" name="title" placeholder="Title...">
      <button class="addBtn">Add</button>
    </form>
  </div>

  <ul id="myUL">
    <?php foreach ($this->data as $todo): ?>
      <li class="<?php if ($todo['state'] == 1) echo 'checked'; ?>"
          value="<?=$todo['id']?>">
          <?=$todo['title']?>
          <a href="/todos/delete/<?=$todo['id']?>" onclick="event.stopPropagation();" class="close">&#10006;</a>
      </li>
    <?php endforeach; ?>
  </ul>

  <script>
document
  .querySelectorAll('li')
  .forEach(function (el) {
     el.addEventListener('click', function () {
        console.log('clicker: ' + el.value)
        ajax(el.value)
        el.classList.toggle('checked')
      } )
  })

function ajax (id) {
  var data = new FormData();
  data.append('id', id);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText)
    }
  };
  xhttp.open("POST", "/todos/toggle", true);
  xhttp.send(data);
}

  </script>

</body>