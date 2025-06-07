<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="h4 text-blue">Finding of Unit</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.manage-site-finding.add-units', ['id' => request('site-id')]) }}"
                        class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>  Add Units
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-borderless table-striped">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Before Photos</th>
                            <th>Finding</th>
                            <th>Unit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="sortable_categories">
                        @forelse ($startfinding as $item)
                            <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                <td>
                                    <div class="image-slider">
                                        @php
                                            $images = json_decode($item->find_before_img) ?? [$item->find_before_img];
                                        @endphp
                                        @foreach($images as $image)
                                            <div class="avatar mr-2">
                                                <a href="/images/finding/original/{{ $image }}"
                                                    data-fancybox="gallery-{{ $item->id }}">
                                                    <img src="/images/finding/thumbnails/{{ $image }}" width="150" height="150"
                                                        class="img-thumbnail" alt="">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    {{ $item->find_name }} - {{ $item->id }}
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-site-finding.add-units', ['id' => $item->id]) }}"
                                            class="text-primary" title="Add Units"></title>
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.manage-site-finding.edit-category', ['id' => $item->id]) }}"
                                            class="text-primary">
                                            <i class="dw dw-edit2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteCategoryBtn"
                                            data-id="{{ $item->id }}">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No Findings found!</span>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="d-block mt-2">
                {{ $startfinding->links('livewire::simple-bootstrap' ) }}
            </div>
        </div>
    </div>

</div>