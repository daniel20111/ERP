<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property int $id
 * @property string $name_branch
 * @property string $address_branch
 * @property string $type_branch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Warehouse[] $warehouses
 * @property-read int|null $warehouses_count
 * @method static \Database\Factories\BranchFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Query\Builder|Branch onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddressBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereNameBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereTypeBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Branch withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Branch withoutTrashed()
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Egress
 *
 * @property int $id
 * @property int $quantity_egress
 * @property int $product_id
 * @property int $entry_id
 * @property int $product_transfer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Entry $entry
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductTransfer $product_transfer
 * @method static \Database\Factories\EgressFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Egress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Egress query()
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereEntryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereProductTransferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereQuantityEgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Egress whereUpdatedAt($value)
 */
	class Egress extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $names_employee
 * @property string $last_name_employee
 * @property string $CI_employee
 * @property string $birth_date_employee
 * @property int $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Branch|null $branch
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Query\Builder|Employee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthDateEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCIEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLastNameEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNamesEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Employee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Employee withoutTrashed()
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Entry
 *
 * @property int $id
 * @property int $quantity_entry
 * @property int $remain_entry
 * @property int $product_id
 * @property int $section_id
 * @property int $entry_order_products_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\EntryOrderProduct $entry_order_products
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Section $section
 * @method static \Database\Factories\EntryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entry newQuery()
 * @method static \Illuminate\Database\Query\Builder|Entry onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Entry query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereEntryOrderProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereQuantityEntry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereRemainEntry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Entry withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Entry withoutTrashed()
 */
	class Entry extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EntryOrder
 *
 * @property int $id
 * @property string $code_entry_order
 * @property bool $verified_entry_order
 * @property bool $error_entry_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EntryOrderProduct[] $entry_order_products
 * @property-read int|null $entry_order_products_count
 * @method static \Database\Factories\EntryOrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|EntryOrder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereCodeEntryOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereErrorEntryOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrder whereVerifiedEntryOrder($value)
 * @method static \Illuminate\Database\Query\Builder|EntryOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EntryOrder withoutTrashed()
 */
	class EntryOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EntryOrderProduct
 *
 * @property int $id
 * @property int $entry_order_id
 * @property int $product_id
 * @property int $quantity
 * @property bool $verified
 * @property bool $error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entry[] $entries
 * @property-read int|null $entries_count
 * @property-read \App\Models\EntryOrder $entry_order
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\EntryOrderProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct newQuery()
 * @method static \Illuminate\Database\Query\Builder|EntryOrderProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereEntryOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntryOrderProduct whereVerified($value)
 * @method static \Illuminate\Database\Query\Builder|EntryOrderProduct withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EntryOrderProduct withoutTrashed()
 */
	class EntryOrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Module
 *
 * @property int $id
 * @property string $name_module
 * @property string|null $icon_module
 * @property string|null $route_module
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\ModuleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Query\Builder|Module onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIconModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereNameModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRouteModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Module withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Module withoutTrashed()
 */
	class Module extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $model_product
 * @property string|null $description_product
 * @property string|null $url_image_product
 * @property string $format_product
 * @property string|null $code_product
 * @property string|null $family_product
 * @property string|null $finish_product
 * @property string|null $brand_product
 * @property string|null $origin_product
 * @property string|null $unit_measure_product
 * @property int|null $units_box_product
 * @property float|null $area_box_product
 * @property int|null $boxes_pallet_product
 * @property float|null $area_pallet_product
 * @property float|null $weight_box_product
 * @property float|null $weight_pallet_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entry[] $entries
 * @property-read int|null $entries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EntryOrderProduct[] $entry_order_products
 * @property-read int|null $entry_order_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductRequest[] $product_requests
 * @property-read int|null $product_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductSale[] $product_sales
 * @property-read int|null $product_sales_count
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAreaBoxProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAreaPalletProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBoxesPalletProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCodeProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescriptionProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFamilyProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFinishProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFormatProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereModelProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOriginProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitMeasureProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitsBoxProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUrlImageProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeightBoxProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeightPalletProduct($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductRequest
 *
 * @property int $id
 * @property int $branch_id
 * @property int $user_id
 * @property bool $verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductRequestFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductRequest whereVerified($value)
 */
	class ProductRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductSale
 *
 * @property int $id
 * @property int $sale_id
 * @property int $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Sale $sale
 * @method static \Database\Factories\ProductSaleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductSale onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductSale withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductSale withoutTrashed()
 */
	class ProductSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductTransfer
 *
 * @property int $id
 * @property int $product_id
 * @property int $transfer_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Transfer $transfer
 * @method static \Database\Factories\ProductTransferFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductTransfer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereTransferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductTransfer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductTransfer withoutTrashed()
 */
	class ProductTransfer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name_role
 * @property string|null $description_role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Module[] $modules
 * @property-read int|null $modules_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescriptionRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereNameRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sale
 *
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Branch $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductSale[] $productSale
 * @property-read int|null $product_sale_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SaleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sale onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Sale withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sale withoutTrashed()
 */
	class Sale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property int $id
 * @property string $name_section
 * @property int $warehouse_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entry[] $entries
 * @property-read int|null $entries_count
 * @property-read \App\Models\Warehouse $warehouse
 * @method static \Database\Factories\SectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Query\Builder|Section onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereNameSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereWarehouseId($value)
 * @method static \Illuminate\Database\Query\Builder|Section withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Section withoutTrashed()
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transfer
 *
 * @property int $id
 * @property int $branch_id
 * @property int $user_id
 * @property bool $verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Branch $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductTransfer[] $product_transfers
 * @property-read int|null $product_transfers_count
 * @property-read \App\Models\TransferOrder|null $transfer_order
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TransferFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transfer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereVerified($value)
 * @method static \Illuminate\Database\Query\Builder|Transfer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transfer withoutTrashed()
 */
	class Transfer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TransferOrder
 *
 * @property int $id
 * @property bool $sent
 * @property bool $received
 * @property int $transfer_id
 * @property int|null $send_by
 * @property string|null $send_date
 * @property int|null $received_by
 * @property string|null $received_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $received_by_user
 * @property-read \App\Models\User|null $sent_by_user
 * @property-read \App\Models\Transfer $transfer
 * @method static \Database\Factories\TransferOrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransferOrder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereReceivedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereSendBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereTransferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransferOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TransferOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransferOrder withoutTrashed()
 */
	class TransferOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property int $employee_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Warehouse
 *
 * @property int $id
 * @property string $name_warehouse
 * @property int $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Branch $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $sections
 * @property-read int|null $sections_count
 * @method static \Database\Factories\WarehouseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newQuery()
 * @method static \Illuminate\Database\Query\Builder|Warehouse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereNameWarehouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Warehouse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Warehouse withoutTrashed()
 */
	class Warehouse extends \Eloquent {}
}

