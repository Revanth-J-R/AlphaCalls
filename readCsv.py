import pandas as pd

# Load the Excel file
file_path = "pizza data.xlsx"
excel_data = pd.read_excel(file_path)

# Convert the DataFrame to a list of dictionaries
pizza_data = excel_data.to_dict(orient="records")

ndir = []

for i in pizza_data:
    ndir.append(
        {
            "Name": i["Pizza Name"],
            "Price": i["Small"],
            "Delivery Time": i["Delivery Time"],
            "Availability": i["Availability"],
            "img": i["Image URL"],
        }
    )
    ndir.append(
        {
            "Name": i["Pizza Name"],
            "Price": i["Medium"],
            "Delivery Time": i["Delivery Time"],
            "Availability": i["Availability"],
            "img": i["Image URL"],
        }
    )
    ndir.append(
        {
            "Name": i["Pizza Name"],
            "Price": i["Large"],
            "Delivery Time": i["Delivery Time"],
            "Availability": i["Availability"],
            "img": i["Image URL"],
        }
    )

for record in ndir:
    print(record)
