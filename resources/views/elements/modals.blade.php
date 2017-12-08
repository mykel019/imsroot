<!-- Large modal -->

<div class="modal fade large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">title</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body"></div>
    </div>
  </div>
</div>


<!-- medium modal -->

<div class="modal fade medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title"></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body"></div>
    </div>
  </div>
</div>

<!-- Small modal -->
<div class="modal fade small-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">title</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body"></div>
    </div>
  </div>
</div>



<!-- PO modal -->

<div class="modal fade po-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">Add Inventory Items to PO</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
              <div class="inner-panel">
                  <div class="ip-title">Search For an Item</div>
                  <div class="ip-body">
                      <input type="text" class="form-control product-search" placeholder="Search Item Name Here.." />
                  </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="inner-panel">
                  <div class="ip-title">Inventory Search Result</div>
                  <div class="ip-body">
                      <div class="inventory-search-result" style="height:300px; overflow-y:scroll"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


<!-- DR modal-->
<div class="modal fade dr-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">Add Inventory Items to Delivery</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
              <div class="inner-panel">
                  <div class="ip-title">Search For an Item</div>
                  <div class="ip-body">
                      <input type="text" class="form-control product-search-inventory" placeholder="Search Item Name Here.." />
                  </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="inner-panel">
                  <div class="ip-title">Inventory Search Result</div>
                  <div class="ip-body">
                      <div class="inventory-search-products-result" style="height:300px; overflow-y:scroll"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
