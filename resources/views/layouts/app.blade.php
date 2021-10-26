<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.header.head')
<body @php body_class() @endphp>
@php do_action('get_header') @endphp
@include('partials.header.header')
@yield('content')
@php do_action('get_footer') @endphp
@include('partials.footer.footer')
@php wp_footer() @endphp
</body>
</html>
