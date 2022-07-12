<form method="post">
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
        choose your name
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php foreach ($customerList as $customer): ?>
                <li>
                    <button class="dropdown-item" type="submit" name="submitLogIn"
                            value="<?php echo $customer['id'] ?>"><?php echo $customer['firstname'] . ' ' . $customer['lastname']; ?></button>
                </li>
            <?php endforeach; ?>
    </ul>
</div>
</form>