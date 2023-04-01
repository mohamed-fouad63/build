<div class="modal fade" id="Add_dvice_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">اضافه اجهزه</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">صنف الجهاز </span>
                    <select class="form-select text-end me-3" id="id_dvice_type" required>
                        <option></option>
                    </select>
                    <span class="input-group-text  col-sm-2">موديل الجهاز</span>
                    <select class="form-select " id="select_dvice_name">
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2">سريال الجهاز</span>
                    <input type="text" class="form-control me-3" id="divce_sn_add" placeholder="سريال الجهاز">
                    <span class="input-group-text col-sm-2" id="">نوع الجهاز</span>
                    <input type="text" class="form-control" id="divce_type" placeholder="نوع الجهاز" readonly>
                    <input type="hidden" class="form-control" id="code_inventory" placeholder="كود مخزنى" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2" id="label_divce_ip">IP الجهاز</span>
                    <input type="text" class="form-control me-3" id="divce_ip" placeholder="IP الجهاز">
                    <span class="input-group-text col-sm-2" id="label_pc_doman_name">DVICE NAME</span>
                    <input type="text" class="form-control" id="pc_doman_name" placeholder="dvice name">

                </div>
            </div>
            <div class="modal-footer">
                <div class="form-check flex-grow-1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">ابقاء النافذه مفتوحه</label>
                    <input class="form-check-input" type="checkbox" value="" id="chk_btn"
                        onclick="dismiss_modal_check('chk_btn','add_dvice_btn')">
                </div>
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success disabled" id="add_dvice_btn">اضافه</button>
            </div>
        </div>
    </div>
</div>