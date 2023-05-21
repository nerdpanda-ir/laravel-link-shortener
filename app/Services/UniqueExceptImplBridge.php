<?php

namespace App\Services;
use App\Contracts\Services\UniqueExceptImplBridge as Contract;
class UniqueExceptImplBridge
    extends UniqueExceptExistableBridge
    implements Contract
{
    protected string $exceptColumn;
    protected array $excepts ;
    protected string $only;
    protected string $tableName;
    protected string $onlyColumn;
    public function build(): bool
    {
        return $this->getDatabaseManager()
                    ->table($this->getTableName())
                    ->whereNotIn($this->getExceptColumn(),$this->getExcepts())
                    ->where('name','=',$this->getOnly())
                    ->exists();
    }

    /**
     * @return array
     */
    public function getExcepts(): array
    {
        return $this->excepts;
    }

    /**
     * @param array $excepts
     */
    public function setExcepts(array $excepts): void
    {
        $this->excepts = $excepts;
    }

    public function getOnly(): string
    {
        return $this->only;
    }

    public function setOnly(string $only):void
    {
        $this->only = $only;
    }
    public function getTableName(): string
    {
        return $this->tableName;
    }
    public function setTableName(string $tableName):void {
        $this->tableName = $tableName;
    }
    public function getExceptColumn(): string
    {
        return $this->exceptColumn;
    }

    public function setExceptColumn(string $column): void
    {
        $this->exceptColumn = $column;
    }

}