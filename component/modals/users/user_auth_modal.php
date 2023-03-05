<div class="modal fade" id="User_Auth_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">صلاحيات المستخدم</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3" id="user_details">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">اسم المبنى</span>
                    <select class="form-select text-end me-3" id="building_name_select" required>
                        <option></option>
                    </select>
                    <span class="input-group-text  col-sm-2">اسم الدور</span>
                    <select class="form-control" id="floor_name_select">
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-check flex-grow-1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">ابقاء النافذه مفتوحه</label>
                    <input class="form-check-input" type="checkbox" value="" id="chk_btn"
                        onclick="dismiss_modal_check('chk_btn','add_dvice_btn')">
                </div>
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="" id="add_dvice_btn">اضافه</button>
            </div>
        </div>
    </div>
</div>