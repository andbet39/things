@extends('layouts.admin')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6">
            <textarea class="editable"></textarea>
        </div>
    </div>

    <script type="text/javascript">

        var editor = new MediumEditor('.editable');

        $(function () {
            $('.editable').mediumInsert({
                editor: editor,
                addons: {
                    images: {
                        styles: {
                            slideshow: {
                                label: '<span class="fa fa-play"></span>',
                                added: function ($el) {
                                    $el
                                            .data('cycle-center-vert', true)
                                            .cycle({
                                                slides: 'figure'
                                            });
                                },
                                removed: function ($el) {
                                    $el.cycle('destroy');
                                }
                            }
                        },
                        actions: false
                    }
                }
            });
        });
    </script>


@endsection