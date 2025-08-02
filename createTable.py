import pandas as pd
from sqlalchemy import create_engine, text

# Step 1: Read the Excel file
excel_file_path = "pizza data.xlsx"
df = pd.read_excel(excel_file_path)

# Step 2: Generate SQL code to create the table
table_name = "pizza"
column_types = df.dtypes

sql_column_definitions = []
for column_name, column_type in column_types.items():
    # Enclose column names in backticks to handle spaces and special characters
    column_name_escaped = f"`{column_name}`"

    if column_type == "int64":
        sql_column_type = "INT"
    elif column_type == "float64":
        sql_column_type = "FLOAT"
    elif column_type == "bool":
        sql_column_type = "BOOLEAN"
    elif column_type == "datetime64[ns]":
        sql_column_type = "DATETIME"
    else:
        sql_column_type = "VARCHAR(255)"

    sql_column_definitions.append(f"{column_name_escaped} {sql_column_type}")

sql_create_table = f"CREATE TABLE {table_name} ({', '.join(sql_column_definitions)});"

# Step 3: Connect to the database and create the table
engine = create_engine("mysql+pymysql://root:root@localhost/impulse102")

with engine.connect() as connection:
    connection.execute(text(sql_create_table))

# Step 4: Insert data into the table
df.to_sql(table_name, engine, if_exists="append", index=False)

print(f"Table {table_name} created and data inserted successfully.")
