<div class="form-group">
    <label for="name">Ad Name *</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $adword->name ?? '') }}" required placeholder="e.g., Header Banner, Sidebar Ad 1">
    @error('name') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="placement">Placement *</label>
    <select id="placement" name="placement" class="form-control" required>
        @foreach($placements as $key => $label)
            <option value="{{ $key }}" {{ old('placement', $adword->placement ?? '') === $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @error('placement') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="ad_code">Ad Code * (Paste your Google AdWords / ad HTML code here)</label>
    <textarea id="ad_code" name="ad_code" class="form-control" style="min-height: 200px; font-family: monospace; font-size: 0.85rem;" required placeholder="Paste your Google AdSense/AdWords code snippet here...">{{ old('ad_code', $adword->ad_code ?? '') }}</textarea>
    @error('ad_code') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="sort_order">Sort Order</label>
    <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $adword->sort_order ?? 0) }}" style="max-width: 100px;">
</div>

<div class="form-group" style="margin-bottom: 1.5rem;">
    <label class="form-check">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $adword->is_active ?? true) ? 'checked' : '' }}>
        Active (show on site)
    </label>
</div>
