<?php
require "./layout/header.php";

$AllTasks = $task->retrieve();
?>

<div class="content scrollbar" id="style-7">
  <div class="content-background">
    <h1 class="m-0 heading-primary--main text-center">Todo-List</h1>
    <div class="todo_search">
      <input type="search" placeholder="Search Your Todo" name="" id="" />
    </div>
    <div class="todo_items_list">
      <div class="todo_item card">
        <span>
          <input type="checkbox" class="checker" name="" id="" />
        </span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Blanditiis rem repudiandae a quibusdam iusto tenetur cumque?
          Labore reprehenderit, vero quis eligendi minus quos magnam
          enim Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Blanditiis rem repudiandae a quibusdam iusto tenetur cumque?
          Labore reprehenderit, vero quis eligendi minus quos magnam
          enim
        </p>
        <a href="">
          <ion-icon class="icon-size" name="create-outline"></ion-icon>
        </a>
        <a href="">
          <ion-icon class="icon-size" name="close-outline"></ion-icon>
        </a>
      </div>
      <?php foreach ($AllTasks as $task) : ?>
        <div class="todo_item card">
          <span>
            <input type="checkbox" class="checker" name="" id="" />
          </span>
          <p><?= $task['task_title'] ?></p>


          <a href="task_update.php?id=<?= $task['id'] ?>">
            <ion-icon class="icon-size" name="create-outline"></ion-icon>
          </a>
          <a href="task_delete.php?id=<?= $task['id'] ?>">
            <ion-icon class="icon-size" name="close-outline"></ion-icon>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <?php include("./layout/footer.php"); ?>