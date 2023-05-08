<?php

namespace App\Rules;

use App\Traits\DatabaseManagerGetterable;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Contracts\Rule\UniqueExcept as Contract;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
class UniqueExcept implements ValidationRule , Contract
{
    use DatabaseManagerGetterable;
    protected array $excepts = [];
    protected string $columnName;
    protected string $tableName;
    /**
     * @var \Illuminate\Database\DatabaseManager $databaseManager
     */
    protected DatabaseManager $databaseManager;
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $column = $this->getColumnName()??$attribute;
        $isExists  = $this->databaseManager
                            ->table($this->getTableName())
                            ->whereNotIn($column,$value)
                            ->where($column,'=',$value)
                            ->exists();
        dd($isExists);
    }

    public function getExcepts(): array
    {
        return $this->excepts;
    }

    public function setExcepts(array $excepts): void
    {
        $this->excepts = $excepts ;
    }

    public function getColumnName(): string|null
    {
        if (!isset($this->columnName))
            return null;
    }

    public function setColumnName(string $columnName): void
    {
        $this->columnName = $columnName;
    }

    public function getTableName(): string
    {
        if (!isset($this->tableName))
            throw new \Exception('you should use setTableName() method and fill table name property !!!');
        return $this->tableName;
    }

    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }


}
