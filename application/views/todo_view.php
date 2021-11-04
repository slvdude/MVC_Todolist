<div class="todo-container">`
    <h1 style="text-align: center;">Task list</h1>
    <hr>
    <form action="" method="POST" class="create_task">
        <input type="text" placeholder="Enter a task" name="title">
        <button type="submit" name="addTodo">Add task</button>
    </form>
    <div>
        <form action="" method="POST">
            <button type="submit" name="deleteAll">Remove all</button>   
        </form>
        <form action="" method="POST">
            <button type="submit" name="doneAll">Ready all</button>
        </form> 
    </div>
    <hr>
    <?php if(!empty($todoArr)): ?>     
        <ul>
            <?php foreach($todoArr as $todo): ?>
                <li>
                    <div class='todo_container'>
                        <div>
                            <p><?php echo $todo['description'] ?></p>
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="done_todo" value="<?php echo $todo['id']?>"><?php echo $todo['id']?></input>
                                    <button name="doneTodo" type="submit">Ready</button>
                                </form>
                                <form action="" method="POST">
                                    <input type="hidden" name="todo_title" value="<?php echo $todo['id']?>">
                                    <button name="deleteTodo" type="submit">Delete</button>
                                </form> 
                            </div>
                        </div>
                        <div class='round<?php echo $todo['status']? ' done': ''?>'></div>
                    </div>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else: echo '<p style="color: red; font-size: 20px; text-align: center;">No tasks yet</p>'?>
    <?php endif; ?>
</div>