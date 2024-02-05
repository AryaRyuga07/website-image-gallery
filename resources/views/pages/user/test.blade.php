@extends('layout.app')

@section('body')
    <div class="w-screen h-screen flex justify-center items-center">
        <table id="myHero" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        let table = new DataTable('#myHero');
    </script>
@endsection
