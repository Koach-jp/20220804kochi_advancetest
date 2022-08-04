<div>
    <form action="contact/confirm" method="POST" class="inquiry-form">
        @csrf
        <table class="inquiry-table">
            <tr>
                <th class="category">
                    <label for="lastName">
                        お名前 <span>※</span>
                    </label>
                </th>
                <td class="flex-td">
                    <div class="name">
                        <input type="text" name="lastName" id="lastName" wire:model="lastName">
                        <p>例）山田</p>
                        @error('lastName')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="name">
                        <input type="text" name="firstName" wire:model="firstName">
                        <p>例）太朗</p>
                        @error('firstName')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th class="category">
                    性別 <span>※</span>
                </th>
                <td>
                    <input type="radio" name="gender" value="1" id="male"
                    @if ($gender == 1)
                        checked
                    @endif
                    >
                    <label class="radio" for="male">男性</label>
                    <input type="radio" name="gender" value="2" id="female"
                    @if ($gender == 2)
                        checked
                    @endif
                    >
                    <label class="radio" for="female">女性</label>
                </td>
            </tr>
            <tr>
                <th class="category">
                    <label for="email">
                        メールアドレス <span>※</span>
                    </label>
                </th>
                <td>
                    <input type="email" name="email" id="email" wire:model="email">
                    <p>例）test@example.com</p>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <th class="category">
                    <label for="postcode">
                        郵便番号 <span>※</span>
                    </label>
                </th>
                <td class="flex-td">
                    <span class="post-symbol">〒</span>
                    <div class="">
                        <input type="text" name="postcode" id="postcode" class="postcode" wire:model.lazy="postcode" maxlength="8" onkeyup="AjaxZip3.zip2addr(this,'','address','address');">
                        <p>例）123-4567</p>
                        @error('postcode')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th class="category">
                    <label for="address">
                        ご住所 <span>※</span>
                    </label>
                </th>
                <td>
                    <input type="text" name="address" id="address" wire:model="address">
                    <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    <p>※ 住所が自動入力されない場合は
                        <span class="here" onclick="AjaxZip3.zip2addr('postcode','','address','address');">こちら</span>
                    をクリックしてください</p>
                    @error('address')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <th class="category">
                    <label for="buildingName">
                        建物名
                    </label>
                </th>
                <td>
                    <input type="text" name="buildingName" id="buildingName" wire:model="buildingName">
                    <p>例）千駄ヶ谷マンション101</p>
                </td>
            </tr>
            <tr>
                <th class="category">
                    <label for="opinion">
                        ご意見 <span>※</span>
                    </label>
                </th>
                <td>
                    <textarea name="opinion" id="opinion" rows="8" wire:model="opinion"></textarea>
                    @error('opinion')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
        </table>
        <button type="submit" class="button"
        @if (count($errors) > 0 || !$btnDisabler)
            disabled
        @endif
        >確認</button>
        @if (!$btnDisabler)
            <p class="error"><span>※</span> は入力必須項目です。</p>
        @endif
    </form>
</div>
