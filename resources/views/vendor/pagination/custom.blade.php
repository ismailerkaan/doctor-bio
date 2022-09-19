@if ($paginator->hasPages())
    <div class="row ">
        <div class="col-md-12">
            <div class="pagination-tab mt-md-5 d-flex justify-content-center">
                <ul class="pagination mb-0">

                    @if ($paginator->onFirstPage())
{{--                        <li class="page-item disabled">--}}
{{--                            <a class="page-link" href="{{route('admin.dashboard')}}" tabindex="-1"><i--}}
{{--                                    class="feather-chevron-left mr-2"></i>Geri</a>--}}
{{--                        </li>--}}


                    @else
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}"  tabindex="-1"><i--}}
{{--                                    class="feather-chevron-left mr-2"></i>Geri</a>--}}
{{--                        </li>--}}

{{--                        <li class="page-item">--}}
{{--                            <a class="page-link"  href="{{ $paginator->previousPageUrl() }}">İleri<i class="feather-chevron-right ml-2"></i></a>--}}
{{--                        </li>--}}

                    @endif



                    @foreach ($elements as $element)

                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif



                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())

                                    <li class="page-item active">
                                        <a class="page-link" href="#">{{ $page }} <span class="sr-only"></span></a>
                                    </li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach



                    @if ($paginator->hasMorePages())

                            <li class="page-item">
                                <a class="page-link"  href="{{  $paginator->nextPageUrl() }}">İleri<i class="feather-chevron-right ml-2"></i></a>
                            </li>
                    @else
                            <li class="page-item">
                                <a class="page-link" href="#">İleri<i class="feather-chevron-right ml-2"></i></a>
                            </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
