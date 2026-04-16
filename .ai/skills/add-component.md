# Skill: Add a Reusable Component

## Create the component file
```php
// templates/components/[name].php
<?php
/**
 * Component: [Name]
 * @var string $[var1]   [description]
 * @var string $[var2]   [description] (optional, default: '[default]')
 */
$[var2] = $[var2] ?? '[default]';
?>
<div class="bo-card reveal" style="padding:2rem;">
  <!-- use brand colors, bo-* classes, inline styles with #1A2238 #1E2A42 #00D4FF #8E9AAF #FFFFFF -->
  <h3 class="font-display" style="margin-bottom:0.75rem;"><?= htmlspecialchars($[var1]) ?></h3>
  <p style="color:#8E9AAF;font-size:0.875rem;"><?= htmlspecialchars($[var2]) ?></p>
</div>
```

## Use in any template
```php
<?php $view->include('components/[name]', [
  '[var1]' => 'value',
  '[var2]' => 'value',
]) ?>
```

## Rules
- Use `htmlspecialchars()` for all user-controlled vars
- Use `bo-card` as the container when it's a card-style component
- Add `reveal` class for scroll animation
- No hardcoded colors — use brand hex tokens or CSS classes
- `$view` is always available inside components (injected by View::capture)

