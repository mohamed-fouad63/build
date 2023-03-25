<?php
if ($_SESSION['edit'] == 1) {
    ?>
    <div class="dropdown">
        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical" value=""></i>
        </button>
        <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
            <?php if ($_SESSION['edit'] == 1) { ?>
                <li class="d-flex align-items-center edit_dvice_btn">
                    <i class="bi bi-pencil-square"></i>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditModalPC">
                        <label>تعديل البيانات</label>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-trash"></i>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteModalPC">
                        <label>حذف الجهاز </label>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-arrows-move"></i>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                        <label>نقل الجهاز </label>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>