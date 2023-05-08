<?php

namespace App\Rules;

use App\Traits\DatabaseManagerGetterable;
use App\Traits\TranslatorGetterable;
use Closure;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Contracts\Rule\UniqueExcept as Contract;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\ConnectionResolverInterface as DatabaseManager;
class UniqueExcept implements ValidationRule , Contract
{
    use DatabaseManagerGetterable , TranslatorGetterable;
    protected array $excepts = [];
    protected string $columnName;
    protected string $tableName;
    /**
     * @var \Illuminate\Database\DatabaseManager $databaseManager
     */
    protected DatabaseManager $databaseManager;
    protected Translator $translator;
    public function __construct(DatabaseManager $databaseManager , Translator $translator)
    {
        $this->databaseManager = $databaseManager;
        $this->translator = $translator ;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @throws \Exception
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $column = $this->getColumnName()??$attribute;
        $isExists  = $this->databaseManager
                            ->table($this->getTableName())
                            ->whereNotIn($column,$this->getExcepts())
                            ->where($column,'=',$value)
                            ->exists();
        if ($isExists)
            $fail(
                $this->getTranslator()->get('validation.unique', ['attribute' => $attribute])
            );
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
