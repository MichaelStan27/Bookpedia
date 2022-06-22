<h1 class="font-bold text-lg">Filter</h1>
<form action="{{ route('search') }}" method="GET">
    <div class="mb-5">
        <h3 class="font-bold">Category</h3>
        <ul class="ml-2 text-neutral-600">
            <li>
                <input type="checkbox" name="category[]" id="fiction" value="1"
                    @if (isset($category) && in_array(1, $category)) checked @endif>
                <label for="fiction">Fiction</label>
            </li>
            <li>
                <input type="checkbox" name="category[]" id="poetry" value="2"
                    @if (isset($category) && in_array(2, $category)) checked @endif>
                <label for="poetry">Poetry</label>
            </li>
            <li>
                <input type="checkbox" name="category[]" id="science" value="3"
                    @if (isset($category) && in_array(3, $category)) checked @endif>
                <label for="science">Science</label>
            </li>
            <li>
                <input type="checkbox" name="category[]" id="selfhelp" value="4"
                    @if (isset($category) && in_array(4, $category)) checked @endif>
                <label for="selfhelp">Self-help</label>
            </li>
            <li>
                <input type="checkbox" name="category[]" id="comic" value="5"
                    @if (isset($category) && in_array(5, $category)) checked @endif>
                <label for="comic">Comic</label>
            </li>
        </ul>
    </div>
    <div class="mb-5">
        <h3 class="font-bold">Type</h3>
        <ul class="ml-2 text-neutral-600">
            <li>
                <input data-id="typeRadio" type="radio" name="type" id="rent" value="1"
                    @if (isset($type) && $type == 1) checked @endif>
                <label for="rent">Rent</label>
            </li>
            <li>
                <input data-id="typeRadio" type="radio" name="type" id="sell" value="2"
                    @if (isset($type) && $type == 2) checked @endif>
                <label for="sell">Sell</label>
            </li>
        </ul>
    </div>
    <div class="mb-5">
        <h3 class="font-bold">
            Price
            <span id="sortDesc" class="text-xs font-normal text-neutral-400 capitalize">
                @if (isset($type))
                    @switch($type)
                        @case(1)
                            Rent
                        @break

                        @case(2)
                            Sell
                        @break
                    @endswitch
                @else
                    Select a type first
                @endif
            </span>
        </h3>
        <ul class="ml-2">
            <li>
                <input data-id="sortRadio" type="radio" name="price" id="low" value="asc"
                    @if (!isset($type)) disabled @endif
                    @if (isset($priceSort) && $priceSort == 'asc') checked @endif>
                <label data-id="sortRadio"
                    class="@if (!isset($type)) {{ 'text-neutral-400' }} @else {{ 'text-neutral-600' }} @endif"
                    for="low">Low-High</label>
            </li>
            <li>
                <input data-id="sortRadio" type="radio" name="price" id="high" value="desc"
                    @if (!isset($type)) disabled @endif
                    @if (isset($priceSort) && $priceSort == 'desc') checked @endif>
                <label data-id="sortRadio"
                    class="@if (!isset($type)) {{ 'text-neutral-400' }} @else {{ 'text-neutral-600' }} @endif"
                    for="high">High-Low</label>
            </li>
        </ul>
    </div>
    <div class="mb-5">
        <h3 class="font-bold">Title</h3>
        <ul class="ml-2 text-neutral-600">
            <li>
                <input type="radio" name="title" id="ascending" value="asc"
                    @if (isset($titleSort) && $titleSort == 'asc') checked @endif>
                <label for="ascending">Ascending</label>
            </li>
            <li>
                <input type="radio" name="title" id="descending" value="desc"
                    @if (isset($titleSort) && $titleSort == 'desc') checked @endif>
                <label for="descending">Descending</label>
            </li>
        </ul>
    </div>
    <div class="text-center">
        <button type="submit"
            class="w-4/5 py-2 bg-neutral-500 text-white rounded-md hover:bg-neutral-600">Filter</button>
    </div>
</form>
