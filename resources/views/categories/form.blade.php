<div class="form-group">
    <label for="exampleInputName">Name</label>
    <input
        type="text"
        name="name"
        class="form-control"
        required
        value="{{ old('name', $category->name ?? '') }}"
    >
</div>