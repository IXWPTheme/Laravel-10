@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Start Finding</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.manage-site-finding.site-finding-list') }}" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Sites list
                    </a>
                </div>
            </div>
            <hr>
            <form action="{{ route('admin.manage-site-finding.store-finding') }}" method="POST" enctype="multipart/form-data" class="mt-3">
               <input type="hidden" name="site_id" value="{{ Request('site_id') }}">
               <input type="hidden" name="unit_id" value="{{ Request('unit_id') }}">
            @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        <strong><i class="dw dw-checked"></i></strong>
                        {!! Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    {!! Session::get('fail') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">                
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Finding Name</label>
                        <input type="text" class="form-control" name="find_name" placeholder="Enter finding name" value="{{ old('unit_name') }}">
                        @error('find_name')
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div> 
                
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Before Photos</label>
                        <input type="file" name="before_photos[]" id="before_photos" class="form-control" multiple>
                        @error('before_photos')
                            <span class="text-danger ml-2">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div id="image-preview-container" class="d-flex flex-wrap gap-2 mb-3">
                        <!-- Preview images will appear here -->
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">CREATE</button>
            </form>
        </div>
    </div>
  </div>     
@livewire('admin-unit-finding-lists', [
    'unit_id' => Request('unit_id') ,
    'site_id' => Request('site_id') 
])
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
// Initialize Slick when first loading the page
document.addEventListener('DOMContentLoaded', function() {
    initSlickCarousels();
});

// Reinitialize Slick when Livewire updates the DOM
document.addEventListener('livewire:init', function() {
    Livewire.hook('morph.updated', function() {
      // initSlickCarousels();
       //alert("Hello! I am an alert box!!"); 
       setTimeout(function() { 
                   
        initSlickCarousels();
                
                }, 100); 
              });
    
});

function initSlickCarousels() {
    $('.image-slider').not('.slick-initialized').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="dw dw-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="dw dw-arrow-right"></i></button>'
    });
}
$('#before_photos').on('change', function(e) {
    const container = $('#image-preview-container');
    container.empty();
    
    $.each(this.files, function(i, file) {
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('<img>')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50)
                    .addClass('mr-2')
                    .appendTo(container);
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
    // Initialize all Fancybox instances
     $('[data-fancybox]').fancybox({
         buttons: [
            "zoom",
            "slideShow",
            "fullScreen",
            "download",
             "thumbs",
            "close"
         ],
        loop: true,
        protect: true
     });   
});
</script>
@endpush