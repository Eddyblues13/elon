<!-- resources/views/dashboard/transaction-method.blade.php -->

@isset($method)
<div class="form-group">
    <input type="hidden" id="transactionMethod" name="transactionMethod" value="{{ $method }}">
</div>
@endisset