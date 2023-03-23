<?php
require "./layout/header.php";

$AllTasks = $task->retrieve();
?>

<div class="content scrollbar" id="style-7">
  <div class="content-background">
    <h1 class="m-0 heading-primary--main text-center">Todo-List</h1>
    <!-- <div class="todo_search">
      <input type="search" placeholder="Search Your Todo" name="" id="" />
    </div> -->
    <div class="todo_block">
      <div class="todo_items_list" id="todo_items_list">
        <?php foreach ($AllTasks as $task) : ?>
          <div class="todo_item_group" id="row<?= $task['id'] ?>">
            <div class="todo_item card">
              <span>
                <a href="task_update.php?id=<?= $task['id'] ?>" class="checker" style="margin-top: 4px;">
                  <ion-icon class="icon-size" name="checkmark-done-outline"></ion-icon>
                </a>
              </span>
              <p><?= $task['task_title'] ?></p>

              <a href="#" class="description-btn btn" style=" margin-top: 3px;">
                <ion-icon class="icon-size" name="information-circle-outline"></ion-icon>
              </a>
              <!-- <a href="task_update.php?id=<?= $task['id'] ?>">
                <ion-icon class="icon-size" name="create-outline"></ion-icon> -->
              </a>
              <a href="#" onclick="deleteData(<?= $task['id'] ?>,'DELETE')">
                <ion-icon class="icon-size" name="close-outline"></ion-icon>
              </a>

            </div>

            <div class="card todo_description" style="display: none;">
              <h3 class="heading-tertiary">
                <?= $task['task_title'] ?>
              </h3>
              <div class="todo_description-body">
                <p class="paragraph">
                  <?= htmlspecialchars_decode($task['task_description']) ?>
                </p>
                <ul class="todo_description-status">
                  <li>Created Date : <?= date('Y-m-d', strtotime($task['created_date'])) ?></li>
                  <li>Task_Status: <?= $task['task_status'] ?></li>
                  <li>Due_date : <?= date('Y-m-d', strtotime($task['due_date'])) ?></li>
                </ul>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <?php include("./layout/footer.php"); ?>