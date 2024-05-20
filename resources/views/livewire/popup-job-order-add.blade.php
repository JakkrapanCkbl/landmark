<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addJobOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">อื่นๆ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
             {{-- <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" wire:model="phone" />
            </div> --}}
            <div class="form-group">
              <label for="jobtype" class="form-label">รายงานภาษา</label>
              <select name="jobtype" class="form-control" id="jobtype" wire:model="selectedJobType">
              <option value="ไทย 1 ชุด" selected>ไทย 1 ชุด</option>
              <option value="ไทย 2 ชุด">ไทย 2 ชุด</option>
              <option value="ไทย 2 ชุด + CD">ไทย 2 ชุด + PDF</option>
              <option value="อังกฤษ 2 ชุด">อังกฤษ 2 ชุด</option>
              <option value="ไทย 2 ชุด + อังกฤษ 2 ชุด">ไทย 2 ชุด + อังกฤษ 2 ชุด</option>
              <option value="-">-</option>
              </select>
						</div>

            <div class="form-group">
              <label for="jobsize" class="form-label">Job Size</label>
              <select name="jobsize" class="form-control form-select" id="jobsize" wire:model="selectedJobSize">
                <option value="HL" selected>HL</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
              </select>
            </div>

            <div class="form-group">
              <label for="easydiff" class="form-label">Job Difficulty</label>
              <select name="easydiff" class="form-control form-select" id="easydiff" wire:model="selectedEasyDiff">
                <option value="Easy">Easy</option>
                <option value="Normal" selected>Normal</option>
                <option value="Difficult">Difficult</option>
              </select>
            </div>

            <div class="form-group">
              <label for="obj_id" class="form-label">วัตถุประสงค์การประเมิน</label>
              <select name="obj_id" class="form-control form-select" id="obj_id" wire:model="selectedObj_id">
                <option value="1" selected>เพื่อประกอบการพิจารณาสินเชื่อ</option>
                <option value="2">เพื่อทบทวนราคาประเมิน</option>
                <option value="3">ทราบมูลค่าตลาด</option>
                <option value="4">สาธารณะ</option>
                <option value="5">บันทึกมูลค่าทางบัญชี</option>
                <option value="6">พิจารณาภายในบริษัท, ใช้เป็นข้อมูลภายในบริษัท</option>
                <option value="7">เพื่ออ้างอิงในการเจรจาต่อรองราคา</option>
                <option value="8">เพื่อกำหนดราคาซื้อขายทอดตลาด</option>
                <option value="9">เพื่อประกอบการตั้งราคาขายทรัพย์สิน</option>
                <option value="10">ปรับปรุงโครงสร้างหนี้</option>
                <option value="11">อื่น ๆ</option>
              </select>
            </div>

            <div class="form-group">
              <label for="valuationfee" class="form-label">ค่าประเมิน(ไม่รวมVAT)</label>
              <input type="text" class="form-control" name="valuationfee" id="valuationfee" wire:model="valuationfee">
            </div>

            {{-- <div class="form-group">
              <label for="vat" class="form-label">VAT (7%)</label>
              <input type="text" class="form-control" name="vat" id="vat" placeholder="210.00" value="210" wire:model="vat">
            </div>

            <div class="form-group">
              <label for="valuationfeeVat" class="form-label">ค่าประเมิน(+VAT)</label>
              <input type="text" class="form-control" name="valuationfeeVat" id="valuationfeeVat" placeholder="3210" value="3210" wire:model="valuationfeeVat">
            </div> --}}
            <div class="form-group">
              <label for="valuationfee_case" class="form-label">เงื่อนไขการเก็บเงินลูกค้า</label>
              <select name="valuationfee_case" class="form-control form-select" id="valuationfee_case" wire:model="selectedvaluationfee_case">
                <option value="100% วางบิลธนาคาร" selected="">100% วางบิลธนาคาร</option>
                <option value="100% เก็บเงินลูกค้าหน้างาน">100% เก็บเงินลูกค้าหน้างาน</option>
                <option value="50%/50% วางบิล/เก็บเงินก่อนสำรวจและ ณ วันที่ส่งมอบงาน">50%/50% วางบิล/เก็บเงินก่อนสำรวจและ ณ วันที่ส่งมอบงาน</option>
                <option value="100% วางบิล/เก็บเงิน ณ วันที่มอบรายงาน">100% วางบิล/เก็บเงิน ณ วันที่มอบรายงาน</option>
              </select>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">ตกลง</button>
      </div>
    </div>
  </div>
</div>