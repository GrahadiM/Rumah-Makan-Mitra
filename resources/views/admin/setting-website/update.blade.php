@extends('layouts.adm.base')
@section('title','Setting Website')

@push('style')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/') }}" class="btn btn-info btn-sm" target="_blank">
                    <i class="fas fa-search fa-fw"></i>
                    LIHAT WEBSITE
                </a>
                {{-- <div class="card-tools">
                    <a href="{{ route('admin.clear') }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-search fa-fw"></i>
                        BERSIHKAN CACHE
                    </a>
                </div> --}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.setting.update', 1) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-12">Favicon:</label>
                                <input type="file" name="favicon" class="dropify form-control col-9" data-height="190" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif ico" value="{{ old('favicon') }}" data-default-file="{{ asset('/images/website/'.$setting->favicon) }}">
                                <a href="{{ Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->favicon) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-block col-2 ml-3">View Image</a>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Logo :</label>
                                <input type="file" name="logo" class="dropify form-control col-9" data-height="190" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" value="{{ old('logo') }}" data-default-file="{{ asset('/images/website/'.$setting->logo) }}">
                                <a href="{{ Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->logo) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-block col-2 ml-3">View Image</a>
                            </div>
                            <div class="form-group">
                                <label for="title_web">Nama Website :</label>
                                <input type="text" required="" name="title_web" id="title_web" class="form-control" value="{{ $setting->title_web }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomer Telpon :</label>
                                <input type="number" required="" name="phone" id="phone" class="form-control" value="{{ $setting->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="wa">Nomer WhatsApp :</label>
                                <input type="number" required="" name="wa" id="wa" class="form-control" value="{{ $setting->wa }}">
                            </div>
                            <div class="form-group">
                                <label for="mail">Email :</label>
                                <input type="text" required="" name="mail" id="mail" class="form-control" value="{{ $setting->mail }}">
                            </div>
                            <div class="form-group">
                                <label for="working_hours">Jam Operasional :</label>
                                <input type="text" required="" name="working_hours" id="working_hours" class="form-control" value="{{ $setting->working_hours }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="footer_web">Copyright Website :</label>
                                <input type="text" required="" name="footer_web" id="footer_web" class="form-control" value="{{ $setting->footer_web }}">
                            </div>
                            <div class="form-group">
                                <label for="version_web">Versi Website :</label>
                                <input type="text" required="" name="version_web" id="version_web" class="form-control" value="{{ $setting->version_web }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat :</label>
                                <textarea class="form-control"  name="address" id="address" rows="3">{{ $setting->address }}</textarea>
                                {{-- <input type="text" required="" name="address" id="address" class="form-control" value="{{ $setting->address }}"> --}}
                            </div>
                            <div class="form-group">
                                <label for="desc_footer">Deskripsi Singkat :</label>
                                <textarea class="form-control"  name="desc_footer" id="desc_footer" rows="6">{{ $setting->desc_footer }}</textarea>
                                {{-- <input type="text" required="" name="desc_footer" id="desc_footer" class="form-control" value="{{ $setting->desc_footer }}"> --}}
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Simpan</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- summernote -->
<script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('plugins') }}/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="{{ asset('plugins/dropify') }}/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(".summernote").summernote({
        height:200,
        callbacks: {
        // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
        }
    })
    $(".summernote").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('.dropify').dropify({
        messages: {
            default: 'Pilih Gambar',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });
    $('.title').keyup(function(){
        var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g,'-');
        $('.slug').val(title);
    });
</script>
@endpush
