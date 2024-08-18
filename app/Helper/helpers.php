<?php

// Use File;
/**Handle file upload */

function handleUpload($inputName, $model = null)
{
  try {
    if (request()->hasFile($inputName)) {
      if ($model && \File::exists(public_path($model->{$inputName}))) {
        \File::delete(public_path($model->{$inputName}));
      }

      $file = request()->file($inputName);
      $fileName = rand() . $file->getClientOriginalName();
      $file->move(public_path('/uploads'), $fileName);

      $filePath = "/uploads/" . $fileName;

      return $filePath;
    }
  } catch (\Exception $e) {
    throw $e;
  }
}


/**Delete File */
function deleteFileIfExist($filePath)
{
  try {
    if (\File::exists(public_path($filePath))) {
      \File::delete(public_path($filePath));
    }
  } catch (\Exception $e) {
    throw $e;
  }
}

/**Function get Color Skill Item */
function getColor($index)
{
  $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];

  return $colors[$index % count($colors)];
}

/* Set sidebar item active */
function setSidebarActive($route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'active';
      }
    }
  }
}

function setNavbarActive($route)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'current-menu-ancestor';
      }
    }
  }
}

function setSubNavbarActive($route, ...$slug)
{
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r)) {
        return 'current-menu-item active';
      }
    }
  }
}

function setSubSlugNavbarActive($route, $slug)
{
  $segment = request()->segment(3);
  if (is_array($route)) {
    foreach ($route as $r) {
      if (request()->routeIs($r) && $segment == $slug) {
        return 'current-menu-item active';
      }
    }
  }
}

function abbreviate($string)
{
  if (!$string || empty($string)) {
    return '';
  }

  $words = explode(' ', $string);
  $abbreviation = '';
  foreach ($words as $word) {
    $abbreviation .= $word[0];
  }
  return strtoupper($abbreviation);
}

// app/Helpers/Helper.php

if (!function_exists('setNavbarActiveNew')) {
  function setNavbarActiveNew($routes)
  {
    if (is_array($routes)) {
      foreach ($routes as $route) {
        if (request()->routeIs($route)) {
          return 'active';
        }
      }
    } elseif (request()->routeIs($routes)) {
      return 'active';
    }
    return '';
  }
}

if (!function_exists('setSubNavbarActiveNew')) {
  function setSubNavbarActiveNew($parentRoute, $subItemUrl)
  {
    $currentUrl = url()->current();
    $subItemFullUrl = url($subItemUrl);

    if ($currentUrl === $subItemFullUrl) {
      return 'active';
    }

    return '';
  }
}
