@php($data=['userId'=>Auth::user()->id, 'categoryList'=>App\Model\Category::where('level', '>', 0)->get()])
<form-component :data='@json($data)'></form-component>
