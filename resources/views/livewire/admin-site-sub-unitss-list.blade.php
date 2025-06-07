<div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="h4 text-blue">Location</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-site-finding.add-sites') }}" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>  Add Sites
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Site image</th>
                                <th>Site name</th>
                                <th>N. of Units</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="sortable_categories">
                            @forelse ($categories as $item)
                            <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/sites/{{ $item->sites_image }}" width="50" height="50" alt="">
                                    </div>
                                </td>
                                <td>
                                    {{ $item->sites_name }}
                                </td>
                                <td>
                                   <div class="table-actions">
                                        <a href="{{ route('admin.manage-site-finding.add-units',['id'=>$item->id]) }}" class="text-primary" title="Add Units" ></title>
                                            <i class="fa fa-plus"></i>
                                        </a>                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-site-finding.edit-category',['id'=>$item->id]) }}" class="text-primary">
                                            <i class="dw dw-edit2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteCategoryBtn" data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">No Location found!</span>
                                    </td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
                <div class="d-block mt-2">
                    {{ $categories->links('livewire::simple-bootstrap') }}
                </div>
            </div>
        </div>
        
      </div>

</div>