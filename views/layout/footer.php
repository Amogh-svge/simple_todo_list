<span class="content-add">
    <button class="btn add-plus" id="addTaskBtn">
        <ion-icon size="large" color="white" name="add"></ion-icon>
    </button>
</span>

<div id="modal" class="modal">
    <span id="closeModal" class="close" title="Close Modal">×</span>
    <form class="modal-content" id="submit_form">
        <div class="modal_container">

            <div class="form-group">
                <label class="form-label" for="task_title">Task Title</label>
                <input type="text" name="task_title" class="form-control" id="task_title" placeholder="Enter task title" />
                <span class="error"></span>
            </div>

            <div class="form-group">
                <label class="form-label" for="due_date">Due Date</label>
                <input type="datetime-local" class="form-control" name="due_date" id="due_date" />
                <span class="error"></span>
            </div>

            <div class="form-group" id="description_form">
                <label class="form-label" for="description">Description</label>
                <textarea name="task_description" class="form-control" id="editor" rows="3" placeholder="Enter task description"></textarea>
                <span class="error"></span>
            </div>

            <div class="form-group">
                <label class="form-label" for="category">Category</label>
                <select class="form-control" name="category_id" id="category">

                    <?php foreach ($allcategories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="error"></span>
            </div>

            <div class="form-group">
                <label class="form-label" for="status">Task Status</label><br />
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="task_status" id="status1" checked value="In_progress" />
                        <label for="status2">In Progress</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="task_status" id="status2" value="Complete" />
                        <label for="status3">Done</label>
                    </div>
                </div>
            </div>

            <button type="submit" name="add_task" id="submit_button" class="submit-button">
                Add Task <ion-icon name="send"></ion-icon>
            </button>
        </div>
    </form>
</div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="
    https://cdn.jsdelivr.net/npm/ckeditor-build-with-simple-upload-provider-strapi-with-image-resize@1.0.7/build/ckeditor.min.js
    "></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

<script>
    //delete row
    const deleteData = (id, method) => {
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'task_delete.php',
                data: {
                    method: method,
                    id: id,
                },
                success: function(response) {
                    $('#row' + id).remove();
                    $('#message').css({
                        "background-color": "#8468b9d4",
                        "display": "block"
                    });
                    $('#message')
                        .append("<p class='message_text' id='message_text'>Task Successfully Deleted</p>")
                        .hide().fadeIn(setTimeout(() => {
                            $('#message_text').remove();
                            $('#message').hide();
                        }, 1500));

                }
            })
        });
    }



    $(document).ready(function() {

        $('#submit_form').on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'task_insert.php',

                data: {
                    action: 'insert-task',
                    task_title: $('#task_title').val(),
                    task_description: $('#editor').val(),
                    due_date: $('#due_date').val(),
                    category_id: $('#category').val(),
                    task_status: $('#status1').val(),
                },
                success: function(response) {
                    try {
                        let resp = JSON.parse(response);
                        $('#message').css({
                            "background-color": "#8468b9d4",
                            "display": "block"
                        });
                        if (resp.status === '500') {
                            $('#message')
                                .append("<p class='message_text' id='message_text'>" + resp.message + "</p>")
                                .hide().fadeIn(setTimeout(() => {
                                    $('#message_text').remove();
                                    $('#message').hide();
                                }, 1500));
                        }
                    } catch (error) {
                        console.log('error has occured ' + error);
                        $('#message')
                            .append("<p class='message_text' id='message_text'>Task Successfully Added</p>")
                            .hide().fadeIn(setTimeout(() => {
                                $('#message_text').remove();
                                $('#message').hide();
                            }, 1500));
                    }

                    $('#submit_form').trigger("reset");
                    $('.todo_block').load(location.href + " #todo_items_list");

                },
                error: function(response) {
                    alert('An Error has occured while inserting task')
                }
            })
        });
    });
</script>
<script>
    // ckeditor
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error("There was a problem initializing the editor.", error);
        });
    // ckeditor


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
    var submit_button = document.getElementById("submit_button");

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

    submit_button.onclick = function(event) {
        Modal.style.display = "none";
    };

    // Modal Ends




    //  description modal
    var TodoItem = document.getElementsByClassName("todo_item");
    var DescriptionBtn = document.getElementsByClassName("description-btn");
    var Modal2 = document.getElementsByClassName("todo_description");
    var i;

    for (i = 0; i < TodoItem.length; i++) {
        DescriptionBtn[i].addEventListener("click", function() {
            var descriptionElement = this.parentNode.nextElementSibling
            descriptionElement.classList.toggle("active");

            // Modal2[i].style.display = "block";
            if (descriptionElement.style.display === "none") {
                descriptionElement.style.display = "block";
            } else {
                descriptionElement.style.display = "none";
            }
        });
    }
    // description modal Ends
</script>
</body>

</html>