<div class="hero__search__form">
    <div class="hero__search__categories">
        Semua Kategori
        <span class="arrow_carrot-down"></span>
    </div>
    <input wire:model="search" type="text" name="search" class="input search-input" list="myList" placeholder="Hayoo cari apa hayoo ?" />
    @if(!empty($query))
    <datalist id="myList">
        @foreach($datalist as $rs)
        <option value="{{$rs->title}}">{{$rs->category->title}}</option>
        @endforeach
        <datalist />
        @endif
</div>