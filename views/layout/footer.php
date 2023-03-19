<span class="content-add">
    <button class="btn add-plus" id="addTaskBtn">
        <ion-icon size="large" color="white" name="add"></ion-icon>
    </button>
</span>

<div id="modal" class="modal">
    <span id="closeModal" class="close" title="Close Modal">×</span>
    <form class="modal-content" method="POST">
        <div class="modal_container">
            <div class="form-group">
                <label class="form-label" for="task-title">Task Title</label>
                <input type="text" name="task_title" class="form-control" id="task-title" placeholder="Enter task title" />
                <?php
                displayError($error, 'task_title');
                ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="due-date">Due Date</label>
                <input type="datetime-local" class="form-control" name="due_date" id="due-date" />
                <?php
                displayError($error, 'due_date');
                ?>
            </div>

            <div class="form-group" id="description_form">
                <label class="form-label" for="description">Description</label>
                <textarea name="task_description" class="form-control" id="editor" rows="3" placeholder="Enter task description"></textarea>
                <?php
                displayError($error, 'task_description')
                ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="category">Category</label>
                <select class="form-control" name="category_id" id="category">

                    <?php foreach ($allcategories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                displayError($error, 'category_id')
                ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="status">Task Status</label><br />
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="task_status" id="status1" checked value="In-progress" />
                        <label for="status2">In Progress</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="task_status" id="status32" value="Complete" />
                        <label for="status3">Done</label>
                    </div>
                </div>
            </div>

            <button type="submit" name="add_task" class="submit-button">
                Add Task <ion-icon name="send"></ion-icon>
            </button>
        </div>
    </form>
</div>
</div>
</div>
</main>
<script src="
    https://cdn.jsdelivr.net/npm/ckeditor-build-with-simple-upload-provider-strapi-with-image-resize@1.0.7/build/ckeditor.min.js
    "></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

<script>
    // Dropdown
    var dropdown = document.getElementsByClassName("accordion_title");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
    // Dropdown Ends

    // Modal 
    var AddTaskButton = document.getElementById("addTaskBtn");
    var Modal = document.getElementById("modal");
    var CloseModal = document.getElementById("closeModal");

    AddTaskButton.addEventListener("click", function() {
        Modal.style.display = "block";
    });

    CloseModal.addEventListener("click", function() {
        Modal.style.display = "none";
    });

    window.onclick = function(event) {
        if (event.target == modal) {
            Modal.style.display = "none";
        }
    };
    // Modal Ends

    // ckeditor
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("There was a problem initializing the editor.", error);
        });
</script>
</body>

</html>