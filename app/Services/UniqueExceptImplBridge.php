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
                    ->where($this->getOnlyColumn(),'=',$this->getOnly())
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
    public function setExcepts(array $excepts): self
    {
        $this->excepts = $excepts;
        return $this;
    }

    public function getOnly(): string
    {
        return $this->only;
    }

    public function setOnly(string $only):self
    {
        $this->only = $only;
        return $this;
    }
    public function getTableName(): string
    {
        return $this->tableName;
    }
    public function setTableName(string $tableName):self {
        $this->tableName = $tableName;
        return $this;
    }
    public function getExceptColumn(): string
    {
        return $this->exceptColumn;
    }

    public function setExceptColumn(string $column): self
    {
        $this->exceptColumn = $column;
        return $this;
    }

    public function getOnlyColumn(): string
    {
        return $this->onlyColumn;
    }

    public function setOnlyColumn(string $column):self
    {
        $this->onlyColumn = $column;
        return $this;
    }


}
