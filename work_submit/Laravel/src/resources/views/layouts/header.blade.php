<header class="site-header">

    <!-- カテゴリ -->
    <nav class="category-menu">
        <ul>
            <li class="menu-item">
                MEN
                <ul class="sub-menu">
                    <li>Trending</li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                </ul>
            </li>
            <li class="menu-item">
                WOMEN
                <ul class="sub-menu">
                    <li>Trending</li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                </ul>
            </li>
            <li class="menu-item">
                KIDS
                <ul class="sub-menu">
                    <li>Trending</li>
                    <li>New Arrival</li>
                    <li>Tops</li>
                    <li>Bottoms</li>
                    <li>Shoes</li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- アイコン -->
    <div class="header-icons">
        {{-- 検索バー --}}
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Search for products">
            <button type="submit">Search</button>
        </form>
        <span>Likes</span>
        <span>Shopping bags</span>
    </div>

</header>