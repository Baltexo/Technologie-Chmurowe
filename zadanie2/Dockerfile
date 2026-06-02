FROM python:3.10-alpine AS builder

WORKDIR /app

RUN apk add --no-cache gcc musl-dev linux-headers

COPY requirements.txt .
RUN pip install --user --no-cache-dir -r requirements.txt

FROM python:3.10-alpine

LABEL org.opencontainers.image.authors="Bartosz Kierepka"

WORKDIR /app

COPY --from=builder /root/.local /root/.local
COPY . .

ENV PATH=/root/.local/bin:$PATH

HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
  CMD wget --no-verbose --tries=1 --spider http://localhost:5000/ || exit 1

EXPOSE 5000

CMD ["python", "app.py"]
